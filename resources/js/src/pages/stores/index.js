import React, { Component } from 'react'
import Layout from "../../layouts/Layout";
import { Route, Link, Switch } from "react-router-dom";

import List from "./list";
import Form from "./form";

export default class Index extends Component {

    constructor(props) {
      super(props)
    
      this.state = {
         entity: 'stores'
      }
    }

    render() {
        return (
            <Layout title={this.state.entity}>
                <div className="container-fluid">
                    <Switch>
                        <Route path={`/${this.state.entity}/edit/:id`} component={Form} />
                        <Route path={`/${this.state.entity}/create`} component={Form} />
                        <Route path="/" component={List} />
                    </Switch>
                </div>
            </Layout>
        )
    }
}
