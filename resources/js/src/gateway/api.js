import axios from "axios";
import { ToastContainer, toast } from 'react-toastify';

class api {

    async checkUserAuth() {
        return await localStorage.getItem('access_token');
    }

    async post(path, data, message = '') {

        try {
            const res = await axios.post(`${path}`, data);
            this.action(message);
            return res.data;
        } catch (err) {
            throw new Error(err.message);
        }
    }

    action(message = '', redirect = '') {
        if (message.length > 0) {
            toast.success(message);
        }
    }

}


export default (new api());


