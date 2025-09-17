import Http from "@/utils/Http";

export default {
  getClient(clientId) {
    return Http.get(`/api/clients/${clientId}`);
  },      
  getclients(query) {  
    return Http.get(`/api/clients/?${query}`);
  },  
  insertClient(form) {
    return Http.post(`/api/clients`, form);
  },
  updateClient(clientId, form) {
    return Http.post(`/api/clients/${clientId}`, form);
  },
  deleteClient(clientId) {
    return Http.delete(`/api/clients/${clientId}`);
  },
};
