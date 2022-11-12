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
        setTemp(temp >= 30 ? 30 : temp + 1);
        context.increment('You`ve added 1 degree!');
    }

    const decrease = () => {
        setTemp(temp ? temp - 1 : 0);
        context.decrement('You`ve turned down 1 degree!');
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

