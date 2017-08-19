<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">

            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-hover ">
            <thead>
            <tr class="info">
                <th>Admission No.</th>
                <th>Name</th>
                <th>Father</th>
                <th>Mother</th>
                <th>Class</th>
                <th>Section</th>
                <th>Roll No.</th>
                <th>DOB</th>
                <th>Contact No.</th>
                <th>Route</th>
                <th>Sch. No</th>
                <th>Old Balance</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($stu_det)): ?>
                <?php foreach ($stu_det as $student_det): ?>
                    <tr class="success ">
                        <td><?php echo $student_det->admission_no?></td>
                        <td><?php echo $student_det->student_first_name ?></td>
                        <td><?php echo $student_det->fathers_first_name ?></td>
                        <td><?php echo $student_det->mothers_first_name ?></td>
                        <td><?php echo $student_det->student_class ?></td>
                        <td><?php echo $student_det->student_section ?></td>
                        <td><?php echo $student_det->student_roll_no ?></td>
                        <td><?php echo $student_det->student_dob ?></td>
                        <td><?php echo $student_det->f_mobile ?></td>
                        <td><?php echo $student_det->route ?></td>
                        <td><?php echo $student_det->scholarship_no ?></td>
                        <td><?php echo $student_det->fees_balance ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No Records Found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-12" style="margin-left: 500px;">
            <form action="<?php echo base_url(); ?>admissions/excel_export" class="form-horizontal" method="post">
                <input type="submit" name="export" class="btn btn-success" value="Export">
            </form>

        </div>
    </div>
</div>
</div>



