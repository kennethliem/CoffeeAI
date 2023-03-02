<?= $this->include('admin/template/header'); ?>

<div class="card border-0 shadow">
    <div class="card-header d-flex justify-content-end">
        <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/tables/" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
            <i class="bi bi-person-fill-add me-2"></i>
            Add Admin
        </a>
    </div>
    <div class="card-body">
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011-07-25</td>
                    <td>$170,750</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('admin/template/footer'); ?>