<template>
    <div>
        <div class="row">
            <div class="col-9 offset-1">

                <div class="card shadow border-left-primary mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Employee</h1>
                            <router-link :to="{name: 'EmployeesIndex'}" class="btn btn-primary float-right" > Back </router-link>
                        </div>

                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateEmployee">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input
                                    v-model="form.first_name"
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input
                                    v-model="form.last_name"
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name (if any)</label>
                                <input
                                    v-model="form.middle_name"
                                    type="text"
                                    class="form-control"
                                    id="middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input
                                    v-model="form.address"
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department Name</label>
                                <select
                                    v-model="form.department_id"
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
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country Name</label>
                                <select v-model="form.country_id"
                                        @change="getStates()"
                                        name="country_id"
                                        id="country_id"
                                        class="form-control"
                                        aria-label="Default select example">

                                    <option v-for="country in countries"
                                            :key="country.id"
                                            :value="country.id"
                                            value="">{{country.name}}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="state_id" class="form-label">State Name</label>
                                <select
                                    v-model="form.state_id"
                                    @change="getCities()"
                                    name="state_id"
                                    id="state_id"
                                    class="form-control"
                                    aria-label="Default select example">

                                    <option
                                        v-for="state in states"
                                        :key="state.id"
                                        :value="state.id"
                                    >{{state.name}}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city_id" class="form-label">City Name</label>
                                <select
                                    v-model="form.city_id"
                                    name="city_id"
                                    id="city_id"
                                    class="form-control"
                                    aria-label="Default select example">

                                    <option
                                        v-for="city in cities"
                                        :key="city.id"
                                        :value="city.id"
                                    >{{city.name}}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input
                                    v-model="form.zip_code"
                                    type="text"
                                    class="form-control"
                                    id="zip_code"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <datepicker
                                    v-model="form.birth_date"
                                    input-class="form-control"
                                    id="birth_date">
                                </datepicker>
                            </div>
                            <div class="mb-3">
                                <label for="date_hired" class="form-label">Date Hired</label>
                                <datepicker
                                    v-model="form.date_hired"
                                    input-class="form-control"
                                    id="date_hired">

                                </datepicker>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
export default {
    components: {
        Datepicker
    },
    data() {
        return{
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birth_date: null,
                date_hired: null
            }
        }
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods:{
        getEmployee() {
            axios
                .get("/api/employees/" + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries(){
            axios.get('/api/employees/countries')
                .then(res =>{
                    this.countries = res.data;
                }).catch(error =>{
                console.log(console.error);
            });
        },
        getStates(){
            axios.get('/api/employees/' +this.form.country_id+ '/states')
                .then(res =>{
                    this.states = res.data;
                }).catch(error =>{
                console.log(console.error);
            });
        },
        getCities(){
            axios.get('/api/employees/' +this.form.state_id+ '/cities')
                .then(res =>{
                    this.cities = res.data;
                }).catch(error =>{
                console.log(console.error);
            });
        },
        getDepartments(){
            axios.get('/api/employees/departments')
                .then(res =>{
                    this.departments = res.data;
                }).catch(error =>{
                console.log(console.error);
            });
        },
        updateEmployee(){
            axios.put('/api/employees/'+ this.$route.params.id,{
                'first_name': this.form.first_name,
                'last_name': this.form.last_name,
                'middle_name': this.form.middle_name,
                'address': this.form.address,
                'department_id': this.form.department_id,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'zip_code': this.form.zip_code,
                'birth_date': this.format_date(this.form.birth_date),
                'date_hired': this.format_date(this.form.date_hired)
            })
                .then(res =>{
                    this.$router.push({name: 'EmployeesIndex'});
                    toastr.success('Employee updated Successfully');
                });
        },
        format_date(value){
            if(value){
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
}
</script>

<style scoped>

</style>
