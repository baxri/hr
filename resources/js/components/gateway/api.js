class api {

    async checkUserAuth() {
        return await localStorage.getItem('access_token');
    }

    async login( form ) {
        
        
        throw new Error("Cannot authorize");

    }
}


export default (new api());


