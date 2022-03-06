@extends('admin.app')
@section('title', 'Content Edit')

@section('main')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Contents</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit</h2>
                        <div class="clearfix"></div>
                    </div>




                    <div class="x_content">
                        @if ($error !== "")
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{ $error }}
                        </div>
                        @endif
                        <br>
                        <form class="form-horizontal form-label-left" action="{{ route('admin_contents_edit', $form['id']) }}" method="post">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">SEO</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="seo" class="form-control" value="{{ $form['seo'] }}" placeholder="SEO">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Page name</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control" value="{{ $form['name'] }}" placeholder="Page name">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Meta title</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="title" class="form-control" value="{{ $form['title'] }}" placeholder="Meta title">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Meta keywords</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="keywords" class="form-control" value="{{ $form['keywords'] }}" placeholder="Meta keywords">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Meta description</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="description" rows="3" placeholder="Meta description">{{ $form['description'] }}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Content</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="content" rows="25" style="direction:ltr;" id="content-editor" >{{ $form['content'] }}</textarea>

<script>
/*
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: 'textarea#content-editor',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  directionality : 'ltr',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {

    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }


    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }


    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });
*/
</script>


                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="is_active">
                                        @if ($form['is_active'] === "0")
                                        <option value="1">Active</option>
                                        <option value="0" selected="selected">Inactive</option>
                                        @else
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                        @endif

                                    </select>
                                </div>
                            </div>







                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('admin_contents') }}" class="btn btn-success">Back</a>

                                </div>
                            </div>

                        </form>
                    </div>





                </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->
@endsection
