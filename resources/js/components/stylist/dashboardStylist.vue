<template>
<div class="container-xl">
        <div class="table-responsive mt-3">
		<div class="table-wrapper">
			<div class="table-title " style="background: #435d7d; color: #ffff; padding: 16px 30px;min-width: 100%;margin: 20px 25px 10px;border-radius: 3px 3px 0 0;">
				<div class="row">
					<div class="col-7">
						<h2><b>Employees</b></h2>
					</div>
					<div class="col-5">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-plus"></i><span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"></i><span>Delete</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>cin</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
