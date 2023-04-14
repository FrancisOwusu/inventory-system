class AppStorage {
    storeToken(token) {
        localStorage.setItem("token", token)
    }
    storeUser(user) {
        localStorage.setItem("user", user)
    }

    store(token, user) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear(){
        localStorage.removeItem("token");
        localStorage.removeItem("user");
    }
    getToken(){
      localStorage.getItem("token");
    }
    getUser(){
        localStorage.getItem("user");
    }
    login(user) {
        return axios
            .post(API_URL + 'signin', {
                username: user.username,
                password: user.password
            })
            .then(response => {
                if (response.data.accessToken) {
                    localStorage.setItem('user', JSON.stringify(response.data));
                }

                return response.data;
            });
    }

    logout() {
        localStorage.removeItem('user');
    }

    register(user) {
        return axios.post(API_URL + 'signup', {
            username: user.username,
            email: user.email,
            password: user.password
        });
    }
}

export default AppStorage = new AppStorage();