

const saveToLocalStorage = (key, WrapComponent) => {
    function saveToLocalStorage(props) {
        const save = (data) => {
            localStorage.setItem(key, data);
        }

        const load = () => {
            return localStorage.getItem(key);
        };

        return <WrapComponent save={save} load={load} {...props} />
    };

    return saveToLocalStorage;
}

export default saveToLocalStorage;