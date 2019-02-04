import React, { Component } from 'react'
import { Route, Link, Switch } from "react-router-dom";
import ReactTable from "react-table";
import api from "../../gateway/api";

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
        let employees = await api.get('/api/employees');

        console.log(employees)

        this.setState({ data: await api.get('/api/employees') });

    }

    render() {
        return (
            <div>

                <ReactTable
                    data={this.state.data}
                    columns={[
                        {
                            Header: "Employees List",
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
                                // {
                                //     Header: "Last Name",
                                //     id: "lastName",
                                //     accessor: d => d.lastName
                                // }
                            ]
                        },
                    ]}
                    defaultPageSize={10}
                    className="-striped -highlight"
                />




                <Link to="/employees/create" className="btn btn-danger create-new">+</Link>
            </div>
        )
    }
}
