<div class="layuimini-container layuimini-page-anim">
    <div class="layuimini-main">



        <div class="layui-form layui-border-box layui-table-view" lay-filter="LAY-table-2" lay-id="currentTableId" style=" ">
            <div class="layui-table-tool">
                <div class="layui-table-tool-temp">
                    <div class="layui-btn-container">
                        <button class="layui-btn layui-btn-normal layui-btn-sm data-add-btn" id="add_category"> 添加分类 </button>
                    </div>
                </div>
            </div>
            <div class="layui-table-box">
                <div class="layui-table-header">
                    <table cellspacing="0" cellpadding="0" border="0" class="layui-table" lay-skin="line" id="currentTableId" style="width:100%">
                        <thead>
                        <tr>
                            <th data-field="id" data-key="2-0-1">
                                <div class="layui-table-cell laytable-cell-2">
                                    <span>分类名称</span>
                                </div></th>
                            <th data-field="username" data-key="2-0-2">
                                <div class="layui-table-cell laytable-cell-3">
                                    <span>系统分类</span>
                                </div></th>
                            <th data-field="10" data-key="2-0-10" data-minwidth="150" class=" layui-table-col-special">
                                <div class="layui-table-cell laytable-cell-7" align="center">
                                    <span>操作</span>
                                </div></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cats as $cat)
                        <tr data-index="0" class="">
                            <td data-field="id" data-key="2-0-1" class="">
                                <div class="layui-table-cell laytable-cell-2">
                                    {{$cat->name}}
                                </div></td>
                            <td data-field="username" data-key="2-0-2" class="">
                                <div class="layui-table-cell laytable-cell-3">
                                    @if($cat->issys == 1)
                                    是
                                    @else
                                    否
                                    @endif
                                </div></td>
                            <td data-field="10" data-key="2-0-10" align="center" data-off="true" data-minwidth="150" class="layui-table-col-special">
                                <div class="layui-table-cell laytable-cell-7" data-id="{{$cat->id}}">
                                    <a class="layui-btn layui-btn-normal layui-btn-xs data-count-edit" id="edit_category">编辑</a>
                                    <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete" id="delete">删除</a>
                                </div></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <style>
            .laytable-cell-2{width:1000px;}
        </style>

    </div>
</div>
<script>
    layui.use(['form', 'table','miniPage','element'], function () {
        var $ = layui.jquery,
            form = layui.form,
            table = layui.table,
            miniPage = layui.miniPage;


        //添加分类
        $('#add_category').on('click',function(){
            console.log('test');
            var content = miniPage.getHrefContent('{{asset('/article/add_category')}}');
            var openWH = miniPage.getOpenWidthHeight();

            var index = layer.open({
                title: '添加分类',
                type: 1,
                id:'ADD_CATEGORY',
                shade: 0.2,
                maxmin:true,
                shadeClose: true,
                area: [openWH[0] + 'px', openWH[1] + 'px'],
                offset: [openWH[2] + 'px', openWH[3] + 'px'],
                content: content,
            });
            $(window).on("resize", function () {
                layer.full(index);
            });
        });
        //编辑分类
        $('#edit_category').on('click',function(){
            var id = this.parentNode.getAttribute('data-id');
            var content = miniPage.getHrefContent('{{asset('/article/edit_category?id=')}}'+id);
            var openWH = miniPage.getOpenWidthHeight();

            var index = layer.open({
                title: '编辑分类',
                type: 1,
                shade: 0.2,
                maxmin:true,
                shadeClose: true,
                area: [openWH[0] + 'px', openWH[1] + 'px'],
                offset: [openWH[2] + 'px', openWH[3] + 'px'],
                content: content,
            });
            $(window).on("resize", function () {
                layer.full(index);
            });
        });
        $(document).on('click','#delete',function(){
            layer.confirm('真的删除行么', function (index) {
                obj.del();
                layer.close(index);
            });
            var checkStatus = table.checkStatus('currentTableId')
                , data = checkStatus.data;
            layer.alert(JSON.stringify(data));
        });



    });
</script>
