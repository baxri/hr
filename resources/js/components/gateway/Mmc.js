class Mmc {

    user() {
        return new Promise(function (result, reject) {
            setTimeout(function () {
                result("RESULT FROM PROMISE");
            }, 2000);
        });
    }
}


export default (new Mmc());


