import React, { Component } from 'react'
import api from "../gateway/api";
import { Button } from 'reactstrap';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

export default class Header extends Component {

    constructor(props) {
        super(props)

        this.state = {

        }
    }

    logout(event) {
        event.preventDefault();
        localStorage.setItem('access_token', '');
        window.location.href = "/"
    }

    render() {
        return (
            <div className="container-fluid animate header">
                <nav className="navbar navbar-expand-md navbar-light bg-light">
                    <a className="navbar-brand" href="#">HR MANAGER</a>
                    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>

                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav mr-auto">
                            <li className="nav-item active">
                                <Link className="nav-link" to="/dashboard">Dashboard</Link>
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link" to="/employees">Employees</Link>
                            </li>
                            {/* <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
        </a>
                                <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a className="dropdown-item" href="#">Action</a>
                                    <a className="dropdown-item" href="#">Another action</a>
                                    <div className="dropdown-divider"></div>
                                    <a className="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> */}

                        </ul>
                        <form className="form-inline my-2 my-lg-0" onSubmit={this.logout.bind(this)}>
                            <Button className="btn btn-danger my-2 my-sm-0" type="submit">Sign Out</Button>
                        </form>
                    </div>
                </nav>
            </div>
        )
    }
}
