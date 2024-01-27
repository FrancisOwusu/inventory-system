class ApiUrl {
   static BASE_URL = 'http://localhost:8000/api/';
    // static LOGIN = `${this.BASE_URL}auth/login`;
    // static EMPLOYEES = `${BASE_URL}employee`;
    // static SUPPLIERS = `${BASE_URL}supplier`


    static LOGIN = `${ApiUrl.BASE_URL}auth/login`;
    static EMPLOYEES = `${ApiUrl.BASE_URL}employee`;
    static SUPPLIERS = `${ApiUrl.BASE_URL}supplier`;
    static CATEGORIES = `${ApiUrl.BASE_URL}categories`;
    static PRODUCTS = `${ApiUrl.BASE_URL}products`;
    static EXPENSES = `${ApiUrl.BASE_URL}expenses`;
    static CUSTOMERS = `${ApiUrl.BASE_URL}customers`;
}

export default ApiUrl
