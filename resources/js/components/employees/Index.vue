<template>
    <div>

        <div class="row">
            <div class="col-9 offset-1">
        <div class="card shadow border-left-primary mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
                    <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary float-right" > Create </router-link>
                </div>
                <div class="row">
                <div class="col-6">
                <input
                    v-model.lazy="search"
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-primary my-2 mt-2" type="submit">Search</button>
                </div>
                <div class="col-6">
                    <select
                        v-model="selectedDepartment"
                        name="department_id"
                        id="department_id"
                        class="form-control"
                        aria-label="Default select example">

                        <option
                            v-for="department in departments"
                            :key="department.id"
                            :value="department.id"
                        >{{department.name}}</option>

                    </select>
                </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Manage</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <tr v-for="employee in employees" :key="employee.id">
                            <td>{{employee.id}}</td>
                            <td>{{employee.first_name}}</td>
                            <td>{{employee.middle_name}}</td>
                            <td>{{employee.last_name}}</td>
                            <td>{{employee.address}}</td>
                            <td>{{employee.department.name}}</td>
                            <td class="text-center">
                                <router-link :to="{
                                    name: 'EmployeesEdit',
                                    params: {id: employee.id}
                                }" class="btn btn-info btn-circle btn-sm"> <i class="fas fa-info-circle"></i></router-link>
                                <button class="mt-2 btn btn-danger btn-circle btn-sm" @click="deleteEmployee(employee.id)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
       return {
           employees: [],
           search: null,
           selectedDepartment: null,
           departments: []
        }
    },
    watch: {
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created() {
    this.getEmployees();
    this.getDepartments();
    },
    methods: {
    getEmployees(){
        axios.get('/api/employees',{params: {
            search: this.search,
                department_id: this.selectedDepartment
            }})
        .then(res=>{
            this.employees = res.data.data;
        }).catch(error =>{
            console.log(error);
        })
    },
        getDepartments(){
            axios.get('/api/employees/departments')
                .then(res =>{
                    this.departments = res.data;
                }).catch(error =>{
                console.log(console.error);
            });
        },
        deleteEmployee(id){
        axios.delete('api/employees/'+ id).then(res => {
            this.getEmployees();
            toastr.success('Employee Deleted Successfully');
        })
        }
    }
}
</script>
<style>

</style>
