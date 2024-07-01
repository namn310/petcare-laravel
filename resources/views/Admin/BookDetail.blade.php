
@extends('Admin.Layout')
@section('content')
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=book">Danh sách lịch hẹn</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="container-fluid border border-primary rounded">
    <div class="p-4">
        <?php
        foreach ($data as $row) {

        ?>

            <div class="name d-inline-block">
                <span>
                    <b class="me-3">Tên khách hàng: </b><?php echo $row->name ?>
                </span>
            </div>
            <div class="local mt-4 ">
                <span>
                    <b class="me-3">Địa chỉ:</b><?php echo $row->address ?>
                </span>
            </div>
            <div class="phone mt-4">
                <span>
                    <b class="me-3">Số điện thoại:</b><?php echo $row->sodienthoai ?>
                </span>
            </div>
            <div class="namePet mt-4">
                <span>
                    <b class="me-3">Tên Pet:</b><?php echo $row->namePet ?>
                </span>
            </div>
            <div class="nameService mt-4">
                <span>
                    <b class="me-3">Tên dịch vụ:</b><?php echo $row->nameService ?>
                </span>
            </div>
            <div class="goi mt-4">
                <span>
                    <b class="me-3">Gói:</b><?php echo $row->goi ?>
                </span>
            </div>
            <div class="dateBook mt-4">
                <span>
                    <b class="me-3">Ngày hẹn:</b><?php echo $row->dateBook ?>
                </span>
            </div>
            <div class="dateCre mt-4">
                <span>
                    <b class="me-3">Ngày tạo:</b><?php echo $row->dateCreate ?>
                </span>
            </div>

            <div class="local mt-4">

                <?php
                if ($row->tinhtrangBook == 1) {
                ?>
                    <button class="btn btn-success">Đã duyệt</button>
                <?php
                } else { ?>
                    <button class="btn btn-danger">Chưa duyệt</button>
                <?php } ?>


            </div>
        <?php
        } ?>

    </div>
</div>
@endsection