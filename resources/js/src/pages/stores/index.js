import React, { Component } from 'react'
import Layout from "../../layouts/Layout";
import { Route, Link, Switch } from "react-router-dom";

import List from "./list";
import Create from "./create";

export default class Index extends Component {
    render() {
        return (
            <Layout title="Stores">
                <div className="container-fluid">
                    <Switch>
                        <Route path="/stores/create" component={Create} />
                        <Route path="/" component={List} />
                    </Switch>
                </div>
            </Layout>
        )
    }
}
