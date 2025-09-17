import { alertWithToast } from "@/utils/toast";
import { ref } from "vue"
import adminService from "../services/panel";
import { useRouter } from 'vue-router'

export default () => {

    const countedData = ref({
        clients: 0,
        bikes: 0,
        earnigs: 0,
        activesPayment: 0,
        manteniment: 0,
    })

    const modalStyle = ref({})

    const router = useRouter()

    const getCountedData = async () => {
        try {
            const response = await adminService.getCountedDataService()
            countedData.value = {
                ...response.data,
            }
        } catch (error) {
            const message = error.response.data.errors.msg || 'Error inesperado';
            alertWithToast(message, 'error')
        }
    }

    const redirectTo = (to: string, params?: any) => {
        /*const rect = e.target.getBoundingClientRect();
        modalStyle.value = {
            "--modal-top": `${rect.top}px`,
            "--modal-left": `${rect.left}px`,
        };*/
        router.push({ path: to, query: {...params} });
    };
    

    return {
        countedData,
        getCountedData,
    }
}