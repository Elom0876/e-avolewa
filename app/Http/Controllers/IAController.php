<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class IAController extends Controller
{
    public function index($produit_id)
    {
        $produit = Produit::findOrFail($produit_id);
        return view('ia.generateur', compact('produit'));
    }

    public function generer(Request $request, $produit_id)
    {
        $produit = Produit::findOrFail($produit_id);

        $couleurPeau = $request->couleur_peau;
        $genre = $request->genre;
        $style = $request->style;

        $descriptionLibre = $request->description ?? '';

        $prompt = "A beautiful African {$genre} with {$couleurPeau} skin tone, 
           wearing an elegant {$style} made of traditional African wax fabric 
           with colors {$produit->couleur},
           {$descriptionLibre},
           full body shot, professional fashion photography, 
           studio lighting, white background, high quality, 
           8k resolution, photorealistic";

        $response = $this->appelHuggingFace($prompt);

        if ($response['success']) {
            return response()->json([
                'success' => true,
                'image' => $response['image']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la génération. Réessayez.'
        ]);
    }

    private function appelHuggingFace($prompt)
    {
        $apiKey = env('HUGGINGFACE_API_KEY');
        $url = 'https://router.huggingface.co/hf-inference/models/stabilityai/stable-diffusion-3.5-large/v1/images/generations';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
        ]));
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        \Log::info('HuggingFace Response', [
            'http_code' => $httpCode,
            'response' => substr($response, 0, 500)
        ]);

        if ($httpCode === 200) {
            $data = json_decode($response, true);
            if (isset($data['data'][0]['url'])) {
                return [
                    'success' => true,
                    'image' => $data['data'][0]['url']
                ];
            }
        }

        return [
            'success' => false,
            'message' => 'Code: ' . $httpCode . ' - ' . substr($response, 0, 200)
        ];
    }
}
