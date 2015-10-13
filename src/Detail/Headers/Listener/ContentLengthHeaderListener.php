<?php

namespace Detail\Headers\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Http\Header;
use Zend\Http\Response as HttpResponse;
use Zend\Mvc\MvcEvent;

class ContentLengthHeaderListener implements
    ListenerAggregateInterface
{
    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * Attach events.
     *
     * This method attaches listeners to the authenticate.pre and authenticate
     * events of Detail\Auth\Identity\IdentityProvider.
     *
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_FINISH,
            array($this, 'onFinish'),
            -9999
        );
    }

    /**
     * Detach events.
     *
     * This method detaches listeners it has previously attached.
     *
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($listener[$index]);
            }
        }
    }

    /**
     * Listener for the "finish" event.
     *
     * @param MvcEvent $event
     */
    public function onFinish(MvcEvent $event)
    {
        $response = $event->getResponse();

        if (!$response instanceof HttpResponse) {
            return;
        }

        $headers = $response->getHeaders();

        if (!$headers->has('Content-Length')) {
            return;
        }

        /** @var Header\ContentLength $contentLengthHeader */
        $contentLengthHeader = $headers->get('Content-Length');

        // Make sure zero content length is set properly:
        // "Content-Length: 0" instead of "Content-Length: "
        if ($contentLengthHeader->getFieldValue() === null) {
            $headers->removeHeader($contentLengthHeader);
            $headers->addHeader(new Header\GenericHeader('Content-Length', 0));
        }
    }
}
