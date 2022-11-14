import { NavLink } from "react-router-dom";

const Header = () => {
    return (
        <header className="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 
        border-bottom">
            <ul className="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li className="nav-item">
                    <NavLink className="nav-link" to={'/'}>Home</NavLink>
                </li>
                <li className="nav-item">
                    <NavLink className="nav-link" to={'/about'}>About</NavLink>
                </li>
            </ul>
        </header>
    );
}

export default Header;