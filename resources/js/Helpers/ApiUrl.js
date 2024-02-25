class ApiUrl {
    static BASE_URL = 'http://localhost:8000/api/';
    static LOGIN = `${ApiUrl.BASE_URL}auth/login`;
    static EMPLOYEES = `${ApiUrl.BASE_URL}employee`;
    static SUPPLIERS = `${ApiUrl.BASE_URL}supplier`;
    static CATEGORIES = `${ApiUrl.BASE_URL}categories`;
    static PRODUCTS = `${ApiUrl.BASE_URL}products`;
    static EXPENSES = `${ApiUrl.BASE_URL}expenses`;
    static CUSTOMERS = `${ApiUrl.BASE_URL}customers`;
    static SALARY = `${ApiUrl.BASE_URL}salary`;
}

export default ApiUrl
