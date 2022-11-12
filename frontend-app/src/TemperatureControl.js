import { useEffect, useState, useContext } from "react";
import NotificationContext from "./context/NotificationContext";


function TemperatureControl({save, load, initial = 10}) {

    const [temp, setTemp] = useState(parseInt(load() ?? initial));
    const context = useContext(NotificationContext);

    useEffect(() => {
        document.title = `Температура ${temp} градусов`
        save(temp);
    });

    const increase = () => {
        if (30 > temp) {
            context.success('You`ve added 1 degree!');
            setTemp(temp >= 30 ? 30 : temp + 1);
        } else {
            context.warning('You can`t add degrees!');
        }
    }

    const decrease = () => {
        if (temp > 0) {
            context.warning('You`ve turned down 1 degree!');
            setTemp(temp ? temp - 1 : 0);
        } else {
            context.warning('You can`t turn down degrees!');
        }
    }

    return (
        <div className="app-container">
            <div className="temperature-display-container">
                <div className={`temperature-display ${temp > 15 ? 'hot' : 'cold'}`}>
                { temp }°C
                </div>
            </div>
            <div className="button-container">
                <button onClick={increase}>+</button>
                <button onClick={decrease}>-</button>
            </div>
        </div>
    );   
}

export default TemperatureControl;

