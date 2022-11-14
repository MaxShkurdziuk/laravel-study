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
import Header from './components/Header';
import Footer from './components/Footer';
import { BrowserRouter, HashRouter, Route, Routes } from 'react-router-dom';
import Home from './pages/Home';
import About from './pages/About';
import Film from './pages/Film';
import Genres from './pages/Genres';

const root = ReactDOM.createRoot(document.getElementById('root'));

const StorageTodoList = saveToLocalStorage('todo-list', ToDoList);
const StorageTemperatureControl = saveToLocalStorage('temperature-control', TemperatureControl);

root.render(
  <React.StrictMode>
    <NotificationProvider>
      <BrowserRouter>
        <Header/>
        <div className='container'>
          <NotificationBar/>
          <Routes>
            <Route path='/' element={<Home/>}/>
            <Route path='/about' element={<About/>}/>
            <Route path='/movies'>
              <Route path=':id' element={<Film />}/>
            </Route>
          </Routes>
        </div>
        <Footer/>
      </BrowserRouter>
    </NotificationProvider>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
