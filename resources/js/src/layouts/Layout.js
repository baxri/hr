import React, { Component } from 'react'
import Header from "../components/Header";
import { ToastContainer } from 'react-toastify';

export default class Layout extends Component {
    render() {

        return (
            <div>
                <Header />
                <p>{this.props.title}</p>
                {this.props.children}
                <ToastContainer />
            </div>
        )
    }
}
