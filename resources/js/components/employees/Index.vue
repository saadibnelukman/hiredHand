<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <router-link></router-link>
                <a href="" class="btn btn-primary btn-icon-split">

                    <span class="text">Create</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <a href="" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {

}
</script>
<style>

</style>
