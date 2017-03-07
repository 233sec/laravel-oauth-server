@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        管理应用
        <small>管理应用</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"> 管理应用 </h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="clients-table" class="table table-condensed table-hover" data-save-filename="应用列表">
                    <thead>
                        <tr>
                            <th>应用</th>
                            <th>CLIENT_ID</th>
                            <th>SECRET</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="hide" id="tpl-client-endpoint-list">
        <div>
        <table data-id="client-endpoints-table" class="table table-condensed table-hover" data-save-filename="应用回调列表">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>操作</th>
                </tr>
            </thead>
        </table>
        </div>
    </div><!--table-responsive-->
@stop

@section('after-scripts-end')
    <script>
        $(function() {
            window.table_client = $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.oauth.client.search") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'id', name: 'id'},
                    {data: 'secret', name: 'secret'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: function(row){
                        return [
                            (function(a){
                                $a = $('<a></a>');
                                $a.attr('class', 'btn btn-xs btn-default');
                                $a.attr('href', '{{ URL::route("admin.oauth.client.endpoint", ["client_id"=>99999]) }}'.replace(/99999/g, a.id));
                                $a.attr('onclick',  'window.list_client_endpoints(this); return false;');
                                $a.attr('data-client_id', a.id);
                                $a.text('回调');
                                return $a;
                            })(row).get(0).outerHTML,
                            ' ',
                            (function(a){
                                $a = $('<a></a>');
                                $a.attr('class', 'btn btn-xs btn-default');
                                $a.attr('href', '{{ URL::route("admin.oauth.client.detail", ["client_id"=>99999]) }}'.replace(/99999/g, a.id));
                                $a.text('编辑');
                                return $a;
                            })(row).get(0).outerHTML,
                            ' ',
                            (function(a){
                                $a = $('<a></a>');
                                $a.attr('class', 'btn btn-xs btn-danger');
                                $a.attr('href', '{{ URL::route("admin.oauth.client.delete", ["client_id"=>99999]) }}'.replace(/99999/g, a.id));
                                $a.attr('onclick', 'window.delete_client(this); return false;');
                                $a.text('删除');
                                return $a;
                            })(row).get(0).outerHTML
                        ].join('');
                    }, name: 'id'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $('#clients-table_wrapper').find('.ext-bak1').removeClass('hide');
            $('#clients-table_wrapper').find('.ext-bak1.btn').removeClass('btn-default').addClass('btn-success');
            $('#clients-table_wrapper').find('.ext-bak1.btn span').text('创建');
            $('#clients-table_wrapper').find('.ext-bak1').on('click', function(){
                location.href = '{{ URL::route("admin.oauth.client.create") }}';
            });

            window.delete_client = function(a){
                $.ajax({
                    url: $(a).attr('href'),
                    method: 'delete',
                    data: {},
                    success: function(){
                        window.table_client.draw();
                    }
                });
            };

            window.delete_client_endpoints = function(a){
                $.ajax({
                    url: $(a).attr('href'),
                    method: 'delete',
                    data: {},
                    success: function(){
                        window.table_client_endpoints.draw();
                    }
                });
            };

            window.list_client_endpoints = function(a){
                bootbox.dialog({
                    size: 'large',
                    onEscape: true,
                    backdrop: true,
                    title: '回调地址列表',
                    message: function(){
                        $html = $($('#tpl-client-endpoint-list').html());
                        $table = $html.find('table');
                        $table.attr('id', $table.attr('data-id'));
                        window.table_client_endpoints = $table.DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: {
                                url: $(a).attr('href'),
                                type: 'get',
                                data: {status: 1, trashed: false}
                            },
                            columns: [
                        {data: function(row){
                                $a = $('<a></a>');
                                $a.attr('href', '{!! URL::route("oauth.authorize.get", ["client_id"=>99999, "redirect_uri"=>99998, "response_type"=>"code"]) !!}'.replace(/99999/g, $(a).attr('data-client_id')).replace(/99998/g, encodeURIComponent(row.redirect_uri)));
                                $a.text(row.redirect_uri);
                                return $a.get(0).outerHTML;
                        }, name: 'redirect_uri'},
                                {data: function(row){
                                    return [
                                        (function(a){
                                            $a = $('<a></a>');
                                            $a.attr('class', 'btn btn-xs btn-default');
                                            $a.attr('href', '{{ URL::route("admin.oauth.client.endpoint.delete", ["client_id"=>99999, "endpoint_id"=>99998]) }}'.replace(/99999/g, a.client_id).replace(/99998/g, a.id));
                                            $a.attr('onclick',  'window.delete_client_endpoints(this); return false;');
                                            $a.text('删除');
                                            return $a;
                                        })(row).get(0).outerHTML
                                    ]
                                }, name: 'id', sortable: false}
                            ]
                        });
                        $html.find('.ext-bak1').removeClass('hide');
                        $html.find('.ext-bak1.btn').addClass('btn-success').removeClass('btn-default');
                        $html.find('.ext-bak1.btn span').text('新增');

                        $html.find('.ext-bak1.btn').on('click', function(){
                            bootbox.prompt('请输入回调 URL', function(c){
                                if(null != c && c){
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ URL::route("admin.oauth.client.endpoint.create", ["client_id"=>99999]) }}'.replace(/99999/g, $(a).attr('data-client_id')),
                                        data: {
                                            update: {
                                                redirect_uri: c
                                            },
                                            _token: $('meta[name="_token"]').attr('content')
                                        },
                                        success: function(json){
                                            if(json.head.statusCode !== 0) return bootbox.alert(json.head.note);
                                            return window.table_client_endpoints.draw();
                                        }
                                    });
                                }
                            });
                        });
                        return $html;
                    }
                });
            };
        });
    </script>
@stop
