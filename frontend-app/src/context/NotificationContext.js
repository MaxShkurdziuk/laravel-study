import { createContext, useState } from 'react';

const NotificationContext = createContext({
    type: null,
    text: null,
    success: () => {},
    error: () => {},
    done: () => {},
    deleteAll: () => {},
    deleteTask: () => {},
    increment: () => {},
    decrement: () => {},
});

const NotificationProvider = (props) => {
    const [type, setType] = useState(null);
    const [text, setText] = useState(null);

    const success = (message) => {
        setType('success');
        setText(message);
    }

    const danger = (message) => {
        setType('danger');
        setText(message);
    }

    const warning = (message) => {
        setType('warning');
        setText(message);
    }

    return (
        <NotificationContext.Provider value={{ type, text, success, warning, danger }}>
            {props.children}
        </NotificationContext.Provider>
    );
}

export { NotificationProvider };

export default NotificationContext;