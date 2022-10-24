import axios from "axios";

let axiosInstance = axios.create({
    headers: { 'content-type': 'application/json' },
    responseType:'json',
});

let api = () => {  
    let token = localStorage.getItem("token");
    if(token) axiosInstance.defaults.headers.common["Authorization"] = "Bearer "+token;
    return axiosInstance;
};

export default {

    //--------- test data ---------//
    activitiesGet(){
        return api().get("test/activities/get")
    },
    transitionsGet(){
        return api().get("test/transitions/get")
    },
    serviceTurnover(val){
        return api().get("test/service/turnover/"+val[0]+"/"+val[1])
    },
    comapnySiren(siren){
        return api().get("test/company/siren/"+siren)
    },
    signIn(formData){
        return api().post("sign/in",formData)
    },
    signUp(formData){
        return api().post("sign/up",formData)
    },
    regionalGrant(region,budget,naf){
        return api().get("test/grants/region/"+region+"/"+budget+"/"+naf)
    },
    cpnGrant(service,budget){
        return api().get("/test/grants/cpn/"+service+"/"+budget)
    },
    saveContact(formData){
        return api().post("/test/contact/save", formData)
    },
    getEvents(){
        return api().get("test/events/get")
    },
    addEvents(formData){
        return api().post("test/events/add",formData)
    },
    generateZoom(cid){
        return api().post("test/zoom/generate",cid)
    },
    confirmContact(contactData){
        return api().post("test/contact/confirm",contactData)
    },

    //--------- leads data ---------//
    getContactsLeads(){
        return api().get("leads/contacts/get")
    },

    //--------- calendar data ---------//

    calendarEventsGet(){
        return api().get("calendar/events/get")
    }
}