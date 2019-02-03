import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import { CustomButtom, CustomInput } from '../styled/Components';
import { ToastContainer, toast } from 'react-toastify';
import api from "../gateway/api";


import 'react-toastify/dist/ReactToastify.css';

export default class Login extends Component {

  constructor(props) {
    super(props)

    this.state = {
      client_id: '1',
      grant_type: 'password',
      username: 'hr@hr.com',
      password: 'hr123456',
      client_secret: 'J2UcxP5OJnOvcxZbCKxZrblJyiJxoamyxyoEPBwN',
    }
  }


  async login(event) {
    event.preventDefault();

    try{
      console.log('rato ar shedid to')
      await api.login(this.state);
      toast.success("Toast Successfully!");
    }catch(err){
      toast.error(err.message);
    }
  }

  handleChange(event) {
    this.setState({ [event.target.name]: event.target.value });
  }

  render() {
    return (
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-6 mt-5">
            <h1 className="text-center">HR MANAGER</h1>
          </div>
        </div>
        <div className="row justify-content-center">
          <div className="col-md-6 mt-5">
            <Form>
              <FormGroup>
                <Label for="exampleEmail">Email</Label>
                <CustomInput type="email" name="username" onChange={this.handleChange.bind(this)} value={this.state.username} id="exampleEmail" placeholder="with a placeholder" />
              </FormGroup>
              <FormGroup>
                <Label for="examplePassword">Password</Label>
                <CustomInput type="password" name="password" onChange={this.handleChange.bind(this)} value={this.state.password} id="examplePassword" placeholder="password placeholder" />
              </FormGroup>
              <CustomButtom onClick={this.login.bind(this)} color="danger col-12">Login</CustomButtom>
            </Form>
          </div>
        </div>
        <ToastContainer />
      </div>
    )
  }
}
