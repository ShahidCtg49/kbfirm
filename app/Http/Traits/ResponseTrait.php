<?php namespace App\Http\Traits;

trait ResponseTrait{
    public function resMessage($status=true, $error=null, $message=null){
        return [
            'response' =>[
                'status' =>$status,
                'error' =>$error,
                'message' => $message,
                'class' =>$status?'success':'danger'
            ]
            ];
    }
    public function resMessageHtml($status=true, $message=null){
        $class=$status?'success':'danger';
        $type=$status?'Success':'Warning';
        return [
            'response' =>[
                'message' => "<div class='alert alert-".$class." alert-dismissible fade show' role='alert'>
                <strong>".$type."!</strong> ".$message."
                <button type='button' class='btn btn-sm btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>"
            ]
            ];
    }
}
