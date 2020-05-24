<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./app/css/bootstrap.css">
    <script src="./app/js/vue.js"></script>
    <script src="./app/js/axios.min.js"></script>
</head>

<body>

<?php

?>


    <div class="container" id="app">
        <br />
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">

                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search"
                                placeholder="Search topics or keywords" name="search" v-model="search_input">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit" @click="DoSearch()">Search</button>
                        </div>
                        <!--end of col-->
                    </div>
                </div>
            </div>
            <!--end of col-->
        </div>


        <table class="table" v-if="isSearch == true">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Account Id</th>
                    <th scope="col">Account Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(s , index) in search_rs">
                    <td>{{index+1}}</td>
                    <td>{{s.acc_id}}</td>
                    <td>{{s.acc_name}}</td> 
                </tr>
            </tbody>
        </table>

    </div>

    <script>

        var app = new Vue({
            el: "#app",
            data: {
                search_input: "",
                search_rs: [],
                isSearch : false
            },
            methods: {

                async  DoSearch() {
                    this.isSearch = true;
                    var search_post = { 'search': this.search_input };
                    var res = await axios.post('./app/action/find_account.php', search_post);
                    this.search_rs = res.data;
                }

            }


        })

    </script>

</body>

</html>