<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    //
    /**
     * @var string
     */
    private $folder;
    /**
     * @var string
     */
    private $filename;
    /**
     * @var string[]
     */
    private $filesExt;
    /**
     * @var string
     */
    private $ext;
    /**
     * @var string[]
     */
    private $filesExt2;

    public function index(Request $request) {

        // Find which protocol to use to pass the full image link back
        if ($request->server('HTTPS')) {
            $server = url();
        } else {
            $server = url();
        }

        if ($request->get('filter_name')) {
            $filter_name = rtrim(str_replace(array('*', '/', '\\'), '', $request->get('filter_name')), '/');
        } else {
            $filter_name = '';
        }

        // Make sure we have the correct directory
        if ($request->get('directory')) {
            $directory = rtrim(DIR_IMAGE . 'catalog/' . session()->get('user_id'). str_replace('*', '', $request->get('directory')), '/');
        } else {
            $directory = DIR_IMAGE . 'catalog/' . session('user_id');
        }

        if (isset($request->get['page'])) {
            $page = $request->get['page'];
        } else {
            $page = 1;
        }

        $directories = array();
        $files = array();

        $this->data['images'] = array();

        //$this->load->model('tool/image');

        if (substr(str_replace('\\', '/', realpath($directory) . '/' . $filter_name), 0, strlen(DIR_IMAGE . 'catalog/' . session()->get('user_id'))) == str_replace('\\', '/', DIR_IMAGE . 'catalog/' . session()->get('user_id'))) {
            // Get directories

            $directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);

            if (!$directories) {
                $directories = array();
            }

            // Get files

            $files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
            //$this->dd($directories);
            if (!$files) {
                $files = array();
            }
        }

        // Merge directories and files
        $images = array_merge($directories, $files);
        // dd($images);
        // Get total number of files and directories
        $image_total = count($images);

        // Split the array based on current page number and max number of items per page of 10
        $images = array_splice($images, ($page - 1) * 16, 16);

        foreach ($images as $image) {

            $name = str_split(basename($image), 14);

            if (is_dir($image)) {
                //dd($image);
                $url = '';

                if ($request->get('target')) {
                    $url .= '&target=' . $request->get('target');
                }

                if ($request->get('thumb')) {
                    $url .= '&thumb=' . $request->get('thumb');
                }
                if ($request->get('type')) {
                    $url .= '&type=' . $request->get('type');
                }

                $this->data['images'][] = array(
                    'thumb' => '',
                    'name'  => implode(' ', $name),
                    'type'  => 'directory',
                    'path'  => substr($image, strlen(DIR_IMAGE)),
                    'href'  => url('filemanager?directory=' . urlencode(substr($image, strlen(DIR_IMAGE . 'catalog/' . session()->get('user_id').'/'))) . $url)
                );
            } else {
                $this->data['images'][] = array(
                    'thumb' => $this->resize(substr($image, strlen(DIR_IMAGE)), 100, 100),
                    'name'  => implode(' ', $name),
                    'type'  => 'image',
                    'path'  => substr($image, strlen(DIR_IMAGE)),
                    'href'  => $server . 'image/' . substr($image, strlen(DIR_IMAGE))
                );

            }
        }
        if ($request->get('directory')) {
            $this->data['directory'] = urlencode($request->get('directory'));
        } else {
            $this->data['directory'] = '';
        }

        if ($request->get('filter_name')) {
            $this->data['filter_name'] = $request->get('filter_name');
        } else {
            $this->data['filter_name'] = '';
        }

        // Return the target ID for the file manager to set the value
        if ($request->get('target')) {
            $this->data['target'] = $request->get('target');
        } else {
            $this->data['target'] = '';
        }

        if ($request->get('type')) {
            $this->data['type'] = $request->get('type');
        } else {
            $this->data['type'] = '';
        }

        // Return the thumbnail for the file manager to show a thumbnail
        if ($request->get('thumb')) {
            $this->data['thumb'] = $request->get('thumb');
        } else {
            $this->data['thumb'] = '';
        }

        // Parent
        $url = '';

        if ($request->get('directory')) {
            $pos = strrpos($request->get('directory'), '/');

            if ($pos) {
                $url .= '&directory=' . urlencode(substr($request->get('directory'), 0, $pos));
            }
        }

        if ($request->get('target')) {
            $url .= '&target=' . $request->get('target');
        }

        if ($request->get('thumb')) {
            $url .= '&thumb=' . $request->get('thumb');
        }
        if ($request->get('type')) {
            $url .= '&type=' . $request->get('type');
        }

        $this->data['parent'] = url('filemanager?'.$url);

        // Refresh
        $url = '';

        if ($request->get('directory')) {
            $url .= '&directory=' . urlencode($request->get('directory'));
        }

        if ($request->get('target')) {
            $url .= '&target=' . $request->get('target');
        }

        if ($request->get('thumb')) {
            $url .= '&thumb=' . $request->get('thumb');
        }
        if ($request->get('type')) {
            $url .= '&type=' . $request->get('type');
        }

        $this->data['refresh'] = url('filemanager?' . $url);

        $url = '';

        if ($request->get('directory')) {
            $url .= '&directory=' . urlencode(html_entity_decode($request->get('directory'), ENT_QUOTES, 'UTF-8'));
        }

        if ($request->get('filter_name')) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($request->get('filter_name'), ENT_QUOTES, 'UTF-8'));
        }

        if ($request->get('target')) {
            $url .= '&target=' . $request->get('target');
        }

        if (isset($request->get['thumb'])) {
            $url .= '&thumb=' . $request->get('thumb');
        }

        return view('filemanager/index', $this->data);
    }

    public function upload(Request $request) {

        $this->json = array();

        // Make sure we have the correct directory
        if ($request->get('directory')) {
            $directory = rtrim(DIR_IMAGE . 'catalog/' . session()->get('user_id') . '/'. $request->get('directory'), '/');
        } else {
            $directory = DIR_IMAGE . 'catalog/' . session()->get('user_id');
        }
        // Check its a directory
        if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)), 0, strlen(DIR_IMAGE . 'catalog')) != str_replace('\\', '/', DIR_IMAGE . 'catalog')) {
            mkdir($directory, 0777);
            chmod($directory , 0777);
            @touch($directory. 'index.html');
        }
        if ($request->get('type')) {
            $this->data['type'] = $request->get('type');
        } else {
            $this->data['type'] = '';
        }
        if (!$this->json) {
            // Check if multiple files are uploaded or just one
            $files = array();

            if (!empty($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {

                foreach (array_keys($_FILES['file']['name']) as $key) {

                    $files[] = array(
                        'name'     => $_FILES['file']['name'][$key],
                        'type'     => $_FILES['file']['type'][$key],
                        'tmp_name' => $_FILES['file']['tmp_name'][$key],
                        'error'    => $_FILES['file']['error'][$key],
                        'size'     => $_FILES['file']['size'][$key]
                    );
                }
            } else {
                dd($_FILES['file']);
            }

            foreach ($files as $file) {
                if (is_file($file['tmp_name'])) {
                    // Sanitize the filename
                    $this->filename = basename(html_entity_decode($file['name'], ENT_QUOTES, 'UTF-8'));

                    // Validate the filename length
                    if ((strlen($this->filename) < 3) || (strlen($this->filename) > 255)) {
                        $this->json['error'] = trans('sentence.filemanager.error_filename');
                    }

                    // Allowed file extension types
                    $allowed = array(
                        'jpg',
                        'jpeg',
                        'gif',
                        'png',
                        'pdf'
                    );

                    if (!in_array(strtolower(substr(strrchr($this->filename, '.'), 1)), $allowed)) {
                        $this->json['error'] = trans('sentence.filemanager.error_filetype');
                    }

                    // Allowed file mime types
                    $allowed = array(
                        'image/jpeg',
                        'image/pjpeg',
                        'image/png',
                        'image/x-png',
                        'image/gif',
                        'application/pdf'
                    );

                    if (!in_array($file['type'], $allowed)) {
                        $this->json['error'] = trans('sentence.filemanager.error_filetype');
                    }

                    // Return any upload error
                    if ($file['error'] != UPLOAD_ERR_OK) {
                        $this->json['error'] = trans('sentence.filemanager.error_upload_'. $file['error']);
                    }
                } else {
                    $this->json['error'] = trans('sentence.filemanager.error_upload');
                }

                if (!$this->json) {
                    move_uploaded_file($file['tmp_name'], $directory . '/' . $this->filename);
                }
            }
        }

        if (!$this->json) {
            $this->json['success'] = trans('sentence.filemanager.text_uploaded');
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->json));
    }

    public function folder(Request $request) {
        $this->lang->load('admin/filemanager');

        $this->json = array();



        // Make sure we have the correct directory
        if ($request->get('directory')) {
            $directory = rtrim(DIR_IMAGE . 'catalog/' . session()->get('user_id') . '/'. $request->get['directory'], '/');
        } else {
            $directory = DIR_IMAGE . 'catalog/' . session()->get('user_id');
        }

        // Check its a directory
        if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)), 0, strlen(DIR_IMAGE . 'catalog')) != str_replace('\\', '/', DIR_IMAGE . 'catalog')) {
            mkdir($directory, 0777);
            chmod($directory , 0777);
            @touch($directory. 'index.html');
            //$this->json['error'] = $this->lang->line('error_directory');
        }

        if ($request->isMethod('POST')) {
            // Sanitize the folder name
            $this->folder = basename(html_entity_decode($request->post('folder'), ENT_QUOTES, 'UTF-8'));

            // Validate the filename length
            if ((strlen($this->folder) < 3) || (strlen($this->folder) > 128)) {
                $this->json['error'] = trans('sentence.filemanager.error_folder');
            }

            // Check if directory already exists or not
            if (is_dir($directory . '/' . $this->folder)) {
                $this->json['error'] = trans('sentence.filemanager.error_exists');
            }
        }

        if (!isset($this->json['error'])) {
            mkdir($directory . '/' . $this->folder, 0777);
            chmod($directory . '/' . $this->folder, 0777);
            @touch($directory . '/' . $this->folder . '/' . 'index.html');

            $this->json['success'] = trans('sentence.filemanager.text_directory');
        }
        //dd($this->json);
//		$this->addHeader('Content-Type: application/json');
//		$this->setOutput(json_encode($this->json));
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->json));
    }

    public function delete() {
        $this->lang->load('admin/filemanager');

        $this->json = array();


        if (!empty($request->post('path'))) {
            $paths = $request->post('path');
        } else {
            $paths = array();
        }

        // Loop through each path to run validations
        foreach ($paths as $path) {
            // Check path exsists
            //echo substr(str_replace('\\', '/', realpath(DIR_IMAGE . $path)), 0, strlen(DIR_IMAGE . 'catalog'));
            //exit;
            if ($path == DIR_IMAGE . 'catalog' || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $path)), 0, strlen(DIR_IMAGE . 'catalog')) != str_replace('\\', '/', DIR_IMAGE . 'catalog')) {
                $this->json['error'] = trans('sentence.filemanager.error_delete');

                break;
            }
        }
        //dd($this->json);
        if (!$this->json) {
            // Loop through each path
            foreach ($paths as $path) {
                $path = rtrim(DIR_IMAGE . $path, '/');

                // If path is just a file delete it
                if (is_file($path)) {
                    unlink($path);

                    // If path is a directory beging deleting each file and sub folder
                } elseif (is_dir($path)) {
                    $files = array();

                    // Make path into an array
                    $path = array($path);

                    // While the path array is still populated keep looping through
                    while (count($path) != 0) {
                        $next = array_shift($path);

                        foreach (glob($next) as $file) {
                            // If directory add to path array
                            if (is_dir($file)) {
                                $path[] = $file . '/*';
                            }

                            // Add the file to the files to be deleted array
                            $files[] = $file;
                        }
                    }

                    // Reverse sort the file array
                    rsort($files);

                    foreach ($files as $file) {
                        // If file just delete
                        if (is_file($file)) {
                            unlink($file);

                            // If directory use the remove directory function
                        } elseif (is_dir($file)) {
                            rmdir($file);
                        }
                    }
                }
            }

            $this->json['success'] = trans('sentence.filemanager.text_delete');
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->json));
    }
}
