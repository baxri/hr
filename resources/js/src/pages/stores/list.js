import React, { Component } from 'react'
import { Route, Link, Switch } from "react-router-dom";
import ReactTable from "react-table";
import api from "../../gateway/api";
import { ToastContainer, toast } from 'react-toastify';

import "react-table/react-table.css";

export default class List extends Component {

    constructor(props) {
        super(props)

        this.state = {
            data: [],
        }
    }

    componentDidMount() {
        this.loadEmployees();
    }

    async loadEmployees() {
        this.setState({ data: await api.get('/api/stores') });
    }

    async delete(id) {
        try {
            await api.post('/api/stores/delete/' + id, {});
            await this.loadEmployees();
            toast.success("Store Successfully Deleted");
        } catch (err) {
            toast.error(err.message);
        }
    }

    render() {
        return (
            <div>

                <ReactTable
                    data={this.state.data}
                    columns={[
                        {
                            Header: "Stores List",
                            columns: [
                                {
                                    Header: "Name",
                                    accessor: "name"
                                },
                                {
                                    Header: "Nature",
                                    accessor: "nature"
                                },
                                {
                                    Header: "City",
                                    accessor: "city"
                                },
                                {
                                    Header: "Company Name",
                                    accessor: "company_name"
                                },
                                {
                                    Header: "Store Type",
                                    accessor: "store_type"
                                },
                                {
                                    Header: "Actions",
                                    accessor: "id",
                                    Cell: row => {
                                        return (<div>
                                            <Link to="#" onClick={() => this.delete(row.value)} className="btn btn-sm btn-danger">Delete</Link>
                                            &nbsp;
                                        <Link to={`stores/edit/${row.value}`} className="btn btn-sm btn-info">Edit</Link>
                                        </div>)
                                    }
                                },
                            ]
                        },
                    ]}
                    defaultPageSize={20}
                    className="-striped -highlight"
                />


                <Link to="/stores/create" className="btn btn-danger create-new">+</Link>
            </div>
        )
    }
}
