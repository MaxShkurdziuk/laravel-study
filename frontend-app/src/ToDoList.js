import { useState } from "react";


function ToDoList() {
    const [input, setInput] = useState('');
    const [tasks, setTasks] = useState([]);

    const onChangeInput = (e) => {
        setInput(e.target.value);
    }

    const addTask = (e) => {
        e.preventDefault();

    if (input === '') {
        return;
    }

        const newTasks = [...tasks, {value: input, isDone: false}];
        setTasks(newTasks);

        setInput('');
    }

    const deleteTasks = (e) => {
        e.preventDefault();
        
        setTasks([]);
    }

    const checkDone = (index) => {
        const newTasks = [...tasks];

        newTasks[index].isDone = !newTasks[index].isDone;

        setTasks(newTasks);
    }

    const taskDelete = (toDoIndex) => {

        const newTasks = tasks.filter((task, index) => index !== toDoIndex);
        setTasks(newTasks);
    }

    return (
        <div className="container d-flex mt-4 justify-content-between">
            <div>
                <h1>ToDoList</h1> 
            </div>
            <div className="lg-6 col-10 justify-content-center">
                <form className="input-group" onSubmit={addTask}>
                    <div className="input-group-append" onClick={deleteTasks}>
                        <button className="input-group-text btn-danger btn-lg">Delete All</button>
                    </div>
                    <input onChange={onChangeInput} value={input} type="text" className="form-control p-2" />
                    <div className="input-group-append">
                        <button className="input-group-text btn-success btn-lg">Add</button>
                    </div>
                </form>
                <div className="my-3 p-3">
                    <ul className="list-group">
                        {tasks.map((task, index) => <Task key={index} toggle={() => checkDone(index)} value={task.value} 
                        isDone={task.isDone} taskDelete={() => taskDelete(index)}/>)}
                    </ul>
                </div>
            </div>
        </div>
    );
}

function Task({ value, isDone, toggle, taskDelete }) {
    return (
        <li className={`d-flex list-group-item justify-content-between bg-${isDone ? 'warning' : 'light'}`} 
        style={isDone ? { textDecoration: 'line-through' } : { textDecoration: 'none' }} >
          <input onChange={toggle} checked={isDone} className="form-check-input me-1" type="checkbox" />
          {value}
          <button onClick={taskDelete} class="btn-close" aria-label="Close"></button>
        </li>
    );
}

export default ToDoList;