import { useEffect, useState } from "react";


function TemperatureControl() {
    const [temp, setTemp] = useState(10);

    useEffect(() => {
        document.title = `Температура ${temp} градусов`
    });

    const increase = () => {
        setTemp(temp >= 30 ? 30 : temp + 1);
    }

    const decrease = () => {
        setTemp(temp ? temp - 1 : 0);
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

