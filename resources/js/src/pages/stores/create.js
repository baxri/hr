import React, { Component } from 'react'
import api from "../../gateway/api";
import { Form, FormGroup, Label, Input, FormText, Button } from 'reactstrap';
import { ToastContainer, toast } from 'react-toastify';

export default class Create extends Component {

    constructor(props) {
        super(props)

        this.state = {
            loading: false,
            schema: [],
            formData: {},
        }
    }

    componentDidMount() {
        this.loadSchema();
    }

    async loadSchema() {
        this.setState({ schema: await api.get('/api/stores/schema') });
    }

    async submit(event) {
        event.preventDefault();
        this.setState({ loading: true });

        try {
            await api.post('/api/stores', this.state.formData);
            window.location.href = "/stores"
        } catch (err) {
            toast.error(err.message);
        } finally {
            this.setState({ loading: false });
        }
    }

    handleChange(event) {
        let formData = this.state.formData;
        formData[event.target.name] = event.target.value;
        this.setState({ formData });
    }

    render() {
        return (
            <div>
                <form onSubmit={this.submit.bind(this)}>
                    {this.state.schema.map(field => {
                        return (<div key={field}>
                            <FormGroup>
                                <Label for={field}>{field}</Label>
                                <Input type="text" name={field} id={field} onChange={this.handleChange.bind(this)} value={this.state.formData[field] ? this.state.formData[field] : ''} />
                            </FormGroup>
                        </div>)
                    })}

                    <Button type="submit" onClick={this.submit.bind(this)} color="danger col-12">{this.state.loading ? "Submiting..." : "Submit"}</Button>
                </form>
            </div >

        )
    }
}
