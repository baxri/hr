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
            entity: 'employees',
            data: [],
        }
    }

    componentDidMount() {
        this.loadEmployees();
    }

    async loadEmployees() {
        this.setState({ data: await api.get(`/api/${this.state.entity}`) });
    }

    async delete(id) {
        try {
            await api.post(`/api/${this.state.entity}/delete/${id}`, {});
            await this.loadEmployees();
            toast.success(`${this.state.entity} Successfully Deleted`);
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
                            Header: `${this.state.entity} list`,
                            columns: [
                                {
                                    Header: "Benchmark Employment",
                                    accessor: "benchmark_employment"
                                },
                                {
                                    Header: "Contract Type",
                                    accessor: "contract_type"
                                },
                                {
                                    Header: "Country",
                                    accessor: "country"
                                },
                                {
                                    Header: "Level",
                                    accessor: "level"
                                },
                                {
                                    Header: "Mensual Salary",
                                    accessor: "mensual_salary"
                                },
                                {
                                    Header: "Actions",
                                    accessor: "id",
                                    Cell: row => {
                                        return (<div>
                                            <Link to="#" onClick={() => this.delete(row.value)} className="btn btn-sm btn-danger">Delete</Link>
                                            &nbsp;
                                        <Link to={`${this.state.entity}/edit/${row.value}`} className="btn btn-sm btn-info">Edit</Link>
                                        </div>)
                                    }
                                },
                            ]
                        },
                    ]}
                    defaultPageSize={20}
                    className="-striped -highlight"
                />


                <Link to={`/${this.state.entity}/create`} className="btn btn-danger create-new">+</Link>
            </div>
        )
    }
}
