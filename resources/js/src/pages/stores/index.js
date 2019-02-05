import React, { Component } from 'react'
import Layout from "../../layouts/Layout";
import { Route, Link, Switch } from "react-router-dom";

import List from "./list";
import Form from "./form";

export default class Index extends Component {
    render() {
        return (
            <Layout title="Stores">
                <div className="container-fluid">
                    <Switch>
                        <Route path="/stores/edit/:id" component={Form} />
                        <Route path="/stores/create" component={Form} />
                        <Route path="/" component={List} />
                    </Switch>
                </div>
            </Layout>
        )
    }
}
