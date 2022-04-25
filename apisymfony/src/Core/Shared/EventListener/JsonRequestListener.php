<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class JsonRequestTransformerListener {


public function onKernelRequest(GetResponseEvent $event) {
    $request = $event->getRequest();
    $content = $request->getContent();
    if (empty($content)) {
        return;
    }
    if (!$this->isJsonRequest($request)) {
        return;
    }
    if (!$this->transformJsonBody($request)) {
        $response = Response::create('Unable to parse request.', 400);
        $event->setResponse($response);
    }
}


private function isJsonRequest(Request $request) {
    return 'json' === $request->getContentType();
}


private function transformJsonBody(Request $request) {
    $data = json_decode($request->getContent(), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return false;
    }
    if ($data === null) {
        return true;
    }
    $request->request->replace($data);
    return true;
}
 }