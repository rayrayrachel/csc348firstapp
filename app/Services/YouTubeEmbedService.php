<?php

namespace App\Services;

class YouTubeEmbedService
{
    /**
     * Extract the YouTube video ID from a given URL.
     */
    public function extractVideoId(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        // Parse the URL
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['host']) && (str_contains($parsedUrl['host'], 'youtube.com') || str_contains($parsedUrl['host'], 'youtu.be'))) {
            // If it's a standard YouTube link
            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryParams);
                return $queryParams['v'] ?? null;
            }

            // If it's a shortened YouTube link
            if (isset($parsedUrl['path'])) {
                return ltrim($parsedUrl['path'], '/');
            }
        }

        return null;
    }

    /**
     * Generate the embed URL for the YouTube video.
     */
    public function generateEmbedUrl(?string $url): ?string
    {
        if (empty($url)) {
            return null; // Return null if no URL is provided
        }

        $videoId = $this->extractVideoId($url);

        if ($videoId) {
            return "https://www.youtube.com/embed/{$videoId}";
        }

        return null;
    }
}

