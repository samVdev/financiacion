import { onMounted, reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import useHttp from "@/composables/useHttp";
import clientservice from "@/modules/Clients/services";
import type User from "../types/User"
import { alertWithToast } from '@/utils/toast';

export default (userId?: string) => {
  const router = useRouter();

  const user: User = reactive({
    name: "",
    email: "",
    phone: "",
    cedula: "",
    dateN: "",
    dir: "",
    earnings: ''
  })
  
  const {
    errors,
    sending,
    loading,
  } = useHttp()

  onMounted(() => {
    if (userId) return getUser()
  })

  const getUser = async () => {
    loading.value = true
    try {
      const response = await clientservice.getClient(userId)
      user.name = response.data.name
      user.email = response.data.email
      user.phone = response.data.phone
      user.cedula = response.data.cedula
      user.dateN = response.data.dateN
      user.dir = response.data.dir
      user.earnings = response.data.earnings
    } catch (error) {
      router.push('/clients').then(() => {
        if (error?.status === 404) {
          alertWithToast('Usuario no encontrado', 'error')
        } else {
          alertWithToast('Ocurrio un error, consulte a soporte', 'error')
        }
      })
    } 
  }

  const insertUser = async (user: User) => {
    try {
      const response = await clientservice.insertClient(user)
      return response.data.message
    } catch (error) {
      throw error
    }
  }

  const updateUser = async (user: User, userId: string) => {
    try {
      const response = await clientservice.updateClient(userId, user)
      return response.data.message
    } catch (error) {
      throw error
    }
  }

  const submit = async (user: User, userId?: string) => {
    try {
      sending.value = true
      const response = !userId ? await insertUser(user) : await updateUser(user, userId)
      router.push({ path: '/clients' }).then(() => alertWithToast(response, 'success'))
    } catch (error) {
      let message = error.response ? error.response.data.message : 'Ha ocurrido un error inesperado'
      message = message.split('. (')[0]
      alertWithToast(message, 'error')
    } finally {
      sending.value = false
    }
  }
  

  return {
    user,
    errors,
    sending,
    router,
    submit
  }

}
