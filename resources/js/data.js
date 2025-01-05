$(document).ready(function() {
  $("#recruitmentTable").DataTable({
      serverSide: true,
      processing: true,
      ajax: {
        url: "/admin/getRecruitments",
        dataSrc: function (json) {
          console.log(json.data)
          return json.data;
        }
      },
      columns: [
        { data: "id", name: "id", visible: false },
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "name", name: "name" },
        { data: "job.position", name: "job.position" },
        { data: "email", name: "email" },
        { 
          data: "file", 
          name: "file", 
          render: function(data, type, row) {
            return `<a href="/storage/recruitments/${data}" class="btn btn-outline-dark"><i class="fas fa-download me-2"></i>Download</a>`;
          },
          orderable: false,
          searchable: false
        },
        { data: "status", name: "status" },
        { 
          data: "created_at", 
          name: "created_at", 
          render: function(data, type, row) {
            const date = new Date(data);
            return date.toLocaleString('en-GB', {
                hour: '2-digit', 
                minute: '2-digit',
                day: '2-digit', 
                month: '2-digit', 
                year: 'numeric', 
                hour12: false
            }).replace(',', '');
          }
        },
        { data: "actions", name: "actions", orderable: false, searchable: false }
      ],
      order: [
          [0, "desc"]
      ],
      lengthMenu: [
          [10, 25, 50, 50, -1],
          [10, 25, 50, 50, "All"],
      ],
  });
  $("#jobTable").DataTable({
    serverSide: true,
    processing: true,
    ajax: {
      url: "/admin/getJobs",
      dataSrc: function (json) {
        return json.data;
      }
    },
    columns: [
      { data: "id", name: "id", visible: false },
      { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
      { data: "position", name: "position" },
      { data: "description", name: "description" },
      { 
        data: "image", 
        name: "image", 
        render: function(data, type, row) {
            if (!data) {
              return `<i>no image</i>`;
            }
            return `<img src="/storage/jobs/${data}" alt="Job Image" class="img-thumbnail" style="width: 80px; height: auto;">`;
        },
        orderable: false,
        searchable: false
      },
      { data: "actions", name: "actions", orderable: false, searchable: false }
    ],
    order: [
        [0, "desc"]
    ],
    lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"],
    ],
  });
  $(".datatable").on("click", ".btn-delete", function(e) {
      e.preventDefault();
      var form = $(this).closest("form");
      var name = $(this).data("name");
      Swal.fire({
          title: "Are you sure want to delete\n" + name + "?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonClass: "bg-primary",
          confirmButtonText: "Yes, delete it!",
      }).then((result) => {
          if (result.isConfirmed) {
              form.submit();
          }
      });
  });
});