<?php

declare(strict_types = 1);

namespace Drupal\oe_oembed_server\Event;

use Drupal\media\MediaInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Used for resolving other sources for the OembedResolver.
 */
class OembedResolverSource extends Event {

  /**
   * The name of the event.
   */
  const OEMBED_RESOLVER_SOURCE = 'oembed_resolver_source';

  /**
   * The media entity being resolved.
   *
   * @var \Drupal\media\MediaInterface
   */
  protected $media;

  /**
   * The query params in the resource URL.
   *
   * @var array
   */
  protected $queryParams = [];

  /**
   * The resolved data to be altered.
   *
   * @var array
   */
  protected $data = [];

  /**
   * OembedResolverAlter constructor.
   *
   * @param \Drupal\media\MediaInterface $media
   *   The media entity being resolved.
   * @param array $query_params
   *   The query params in the resource URL.
   */
  public function __construct(MediaInterface $media, array $query_params) {
    $this->media = $media;
    $this->queryParams = $query_params;
  }

  /**
   * Returns the media entity.
   *
   * @return \Drupal\media\MediaInterface
   *   The media entity.
   */
  public function getMedia(): MediaInterface {
    return $this->media;
  }

  /**
   * Returns the resource URL query parameters.
   *
   * @return array
   *   The query params.
   */
  public function getQueryParams(): array {
    return $this->queryParams;
  }

  /**
   * Returns the resolved data.
   *
   * @return array
   *   The resolved data.
   */
  public function getData(): array {
    return $this->data;
  }

  /**
   * Sets the resolved data.
   *
   * @param array $data
   *   The resolved data.
   */
  public function setData(array $data): void {
    $this->data = $data;
  }

}
