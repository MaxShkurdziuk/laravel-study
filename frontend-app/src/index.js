import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import TemperatureControl from './TemperatureControl';
import ToDoList from './ToDoList';
import saveToLocalStorage from './saveToLocalStorage';
import { NotificationProvider } from './context/NotificationContext';
import NotificationBar from './components/NotificationBanner';

const root = ReactDOM.createRoot(document.getElementById('root'));

const StorageTodoList = saveToLocalStorage('todo-list', ToDoList);
const StorageTemperatureControl = saveToLocalStorage('temperature-control', TemperatureControl);

root.render(
  <React.StrictMode>
    <NotificationProvider>
      <NotificationBar />
    <StorageTemperatureControl />
    {/* <StorageTodoList /> */}
    </NotificationProvider>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
