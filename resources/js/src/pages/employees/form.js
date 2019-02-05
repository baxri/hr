import React, { Component } from 'react'
import { FormGroup, Label, Input, Button } from 'reactstrap';
import { toast } from 'react-toastify';
import { Redirect } from 'react-router'
import api from "../../gateway/api";

export default class Form extends Component {

    constructor(props) {
        super(props)

        this.state = {
            loading: false,
            redirect: null,
            entity: 'employees',
            schema: [],
            formData: {},
        }
    }

    componentDidMount() {
        this.loadData();
    }

    async loadData() {

        if (this.props.match.params.id) {
            this.setState({ formData: await api.get(`/api/${this.state.entity}/${this.props.match.params.id}`) });
        }

        this.setState({ schema: await api.get(`/api/${this.state.entity}/schema`) });
    }

    async submit(event) {
        event.preventDefault();
        this.setState({ loading: true });

        try {
            await api.post(`/api/${this.state.entity}`, this.state.formData);
            toast.success(`${this.state.entity} Successfully Updated!`);
            this.setState({ redirect: this.state.entity });
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

        if (this.state.redirect != null) {
            return <Redirect to={`/${this.state.redirect}`} />;
        }

        return (
            <div>
                <form onSubmit={this.submit.bind(this)}>
                    {this.state.schema.map(field => {
                        return (<div key={field}>
                            <FormGroup>
                                {field != 'id' && <Label for={field}>{field}</Label>}
                                <Input type={field == 'id' ? 'hidden' : 'text'} name={field} id={field} onChange={this.handleChange.bind(this)} value={this.state.formData[field] ? this.state.formData[field] : ''} />
                            </FormGroup>
                        </div>)
                    })}

                    <Button type="submit" onClick={this.submit.bind(this)} color="danger col-12">{this.state.loading ? "Submiting..." : "Submit"}</Button>

                    <br />
                    <br />
                </form>
            </div >

        )
    }
}
