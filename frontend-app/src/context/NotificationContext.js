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

    const error = (message) => {
        setType('danger');
        setText(message);
    }

    const done = (message) => {
        setType('success');
        setText(message);
    }

    const deleteAll = (message) => {
        setType('danger');
        setText(message);
    }

    const deleteTask = (message) => {
        setType('warning');
        setText(message);
    }

    const increment = (message) => {
        setType('success');
        setText(message);
    }

    const decrement = (message) => {
        setType('warning');
        setText(message);
    }

    return (
        <NotificationContext.Provider value={{ type, text, success, error, done, deleteAll, deleteTask, increment, decrement }}>
            {props.children}
        </NotificationContext.Provider>
    );
}

export { NotificationProvider };

export default NotificationContext;