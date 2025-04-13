<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run()
    {
        $canadianProvinces = [
            ['country_code' => 'CA', 'code' => 'AB', 'name' => 'Alberta'],
            ['country_code' => 'CA', 'code' => 'BC', 'name' => 'British Columbia'],
            ['country_code' => 'CA', 'code' => 'MB', 'name' => 'Manitoba'],
            ['country_code' => 'CA', 'code' => 'NB', 'name' => 'New Brunswick'],
            ['country_code' => 'CA', 'code' => 'NL', 'name' => 'Newfoundland and Labrador'],
            ['country_code' => 'CA', 'code' => 'NS', 'name' => 'Nova Scotia'],
            ['country_code' => 'CA', 'code' => 'ON', 'name' => 'Ontario'],
            ['country_code' => 'CA', 'code' => 'PE', 'name' => 'Prince Edward Island'],
            ['country_code' => 'CA', 'code' => 'QC', 'name' => 'Quebec'],
            ['country_code' => 'CA', 'code' => 'SK', 'name' => 'Saskatchewan'],
            ['country_code' => 'CA', 'code' => 'NT', 'name' => 'Northwest Territories'],
            ['country_code' => 'CA', 'code' => 'NU', 'name' => 'Nunavut'],
            ['country_code' => 'CA', 'code' => 'YT', 'name' => 'Yukon']
        ];

        $usStates = [
            ['country_code' => 'US', 'code' => 'AL', 'name' => 'Alabama'],
            ['country_code' => 'US', 'code' => 'AK', 'name' => 'Alaska'],
            ['country_code' => 'US', 'code' => 'AZ', 'name' => 'Arizona'],
            ['country_code' => 'US', 'code' => 'AR', 'name' => 'Arkansas'],
            ['country_code' => 'US', 'code' => 'CA', 'name' => 'California'],
            ['country_code' => 'US', 'code' => 'CO', 'name' => 'Colorado'],
            ['country_code' => 'US', 'code' => 'CT', 'name' => 'Connecticut'],
            ['country_code' => 'US', 'code' => 'DE', 'name' => 'Delaware'],
            ['country_code' => 'US', 'code' => 'FL', 'name' => 'Florida'],
            ['country_code' => 'US', 'code' => 'GA', 'name' => 'Georgia'],
            ['country_code' => 'US', 'code' => 'HI', 'name' => 'Hawaii'],
            ['country_code' => 'US', 'code' => 'ID', 'name' => 'Idaho'],
            ['country_code' => 'US', 'code' => 'IL', 'name' => 'Illinois'],
            ['country_code' => 'US', 'code' => 'IN', 'name' => 'Indiana'],
            ['country_code' => 'US', 'code' => 'IA', 'name' => 'Iowa'],
            ['country_code' => 'US', 'code' => 'KS', 'name' => 'Kansas'],
            ['country_code' => 'US', 'code' => 'KY', 'name' => 'Kentucky'],
            ['country_code' => 'US', 'code' => 'LA', 'name' => 'Louisiana'],
            ['country_code' => 'US', 'code' => 'ME', 'name' => 'Maine'],
            ['country_code' => 'US', 'code' => 'MD', 'name' => 'Maryland'],
            ['country_code' => 'US', 'code' => 'MA', 'name' => 'Massachusetts'],
            ['country_code' => 'US', 'code' => 'MI', 'name' => 'Michigan'],
            ['country_code' => 'US', 'code' => 'MN', 'name' => 'Minnesota'],
            ['country_code' => 'US', 'code' => 'MS', 'name' => 'Mississippi'],
            ['country_code' => 'US', 'code' => 'MO', 'name' => 'Missouri'],
            ['country_code' => 'US', 'code' => 'MT', 'name' => 'Montana'],
            ['country_code' => 'US', 'code' => 'NE', 'name' => 'Nebraska'],
            ['country_code' => 'US', 'code' => 'NV', 'name' => 'Nevada'],
            ['country_code' => 'US', 'code' => 'NH', 'name' => 'New Hampshire'],
            ['country_code' => 'US', 'code' => 'NJ', 'name' => 'New Jersey'],
            ['country_code' => 'US', 'code' => 'NM', 'name' => 'New Mexico'],
            ['country_code' => 'US', 'code' => 'NY', 'name' => 'New York'],
            ['country_code' => 'US', 'code' => 'NC', 'name' => 'North Carolina'],
            ['country_code' => 'US', 'code' => 'ND', 'name' => 'North Dakota'],
            ['country_code' => 'US', 'code' => 'OH', 'name' => 'Ohio'],
            ['country_code' => 'US', 'code' => 'OK', 'name' => 'Oklahoma'],
            ['country_code' => 'US', 'code' => 'OR', 'name' => 'Oregon'],
            ['country_code' => 'US', 'code' => 'PA', 'name' => 'Pennsylvania'],
            ['country_code' => 'US', 'code' => 'RI', 'name' => 'Rhode Island'],
            ['country_code' => 'US', 'code' => 'SC', 'name' => 'South Carolina'],
            ['country_code' => 'US', 'code' => 'SD', 'name' => 'South Dakota'],
            ['country_code' => 'US', 'code' => 'TN', 'name' => 'Tennessee'],
            ['country_code' => 'US', 'code' => 'TX', 'name' => 'Texas'],
            ['country_code' => 'US', 'code' => 'UT', 'name' => 'Utah'],
            ['country_code' => 'US', 'code' => 'VT', 'name' => 'Vermont'],
            ['country_code' => 'US', 'code' => 'VA', 'name' => 'Virginia'],
            ['country_code' => 'US', 'code' => 'WA', 'name' => 'Washington'],
            ['country_code' => 'US', 'code' => 'WV', 'name' => 'West Virginia'],
            ['country_code' => 'US', 'code' => 'WI', 'name' => 'Wisconsin'],
            ['country_code' => 'US', 'code' => 'WY', 'name' => 'Wyoming']
        ];

        $ukRegions = [
            ['country_code' => 'GB', 'code' => 'ENG', 'name' => 'England'],
            ['country_code' => 'GB', 'code' => 'SCT', 'name' => 'Scotland'],
            ['country_code' => 'GB', 'code' => 'WLS', 'name' => 'Wales'],
            ['country_code' => 'GB', 'code' => 'NIR', 'name' => 'Northern Ireland']
        ];

        $australianStates = [
            ['country_code' => 'AU', 'code' => 'NSW', 'name' => 'New South Wales'],
            ['country_code' => 'AU', 'code' => 'QLD', 'name' => 'Queensland'],
            ['country_code' => 'AU', 'code' => 'SA', 'name' => 'South Australia'],
            ['country_code' => 'AU', 'code' => 'TAS', 'name' => 'Tasmania'],
            ['country_code' => 'AU', 'code' => 'VIC', 'name' => 'Victoria'],
            ['country_code' => 'AU', 'code' => 'WA', 'name' => 'Western Australia'],
            ['country_code' => 'AU', 'code' => 'ACT', 'name' => 'Australian Capital Territory'],
            ['country_code' => 'AU', 'code' => 'NT', 'name' => 'Northern Territory']
        ];

        $indianStates = [
            ['country_code' => 'IN', 'code' => 'AP', 'name' => 'Andhra Pradesh'],
            ['country_code' => 'IN', 'code' => 'AR', 'name' => 'Arunachal Pradesh'],
            ['country_code' => 'IN', 'code' => 'AS', 'name' => 'Assam'],
            ['country_code' => 'IN', 'code' => 'BR', 'name' => 'Bihar'],
            ['country_code' => 'IN', 'code' => 'CT', 'name' => 'Chhattisgarh'],
            ['country_code' => 'IN', 'code' => 'GA', 'name' => 'Goa'],
            ['country_code' => 'IN', 'code' => 'GJ', 'name' => 'Gujarat'],
            ['country_code' => 'IN', 'code' => 'HR', 'name' => 'Haryana'],
            ['country_code' => 'IN', 'code' => 'HP', 'name' => 'Himachal Pradesh'],
            ['country_code' => 'IN', 'code' => 'JK', 'name' => 'Jammu and Kashmir'],
            ['country_code' => 'IN', 'code' => 'JH', 'name' => 'Jharkhand'],
            ['country_code' => 'IN', 'code' => 'KA', 'name' => 'Karnataka'],
            ['country_code' => 'IN', 'code' => 'KL', 'name' => 'Kerala'],
            ['country_code' => 'IN', 'code' => 'MP', 'name' => 'Madhya Pradesh'],
            ['country_code' => 'IN', 'code' => 'MH', 'name' => 'Maharashtra'],
            ['country_code' => 'IN', 'code' => 'MN', 'name' => 'Manipur'],
            ['country_code' => 'IN', 'code' => 'ML', 'name' => 'Meghalaya'],
            ['country_code' => 'IN', 'code' => 'MZ', 'name' => 'Mizoram'],
            ['country_code' => 'IN', 'code' => 'NL', 'name' => 'Nagaland'],
            ['country_code' => 'IN', 'code' => 'OR', 'name' => 'Odisha'],
            ['country_code' => 'IN', 'code' => 'PB', 'name' => 'Punjab'],
            ['country_code' => 'IN', 'code' => 'RJ', 'name' => 'Rajasthan'],
            ['country_code' => 'IN', 'code' => 'SK', 'name' => 'Sikkim'],
            ['country_code' => 'IN', 'code' => 'TN', 'name' => 'Tamil Nadu'],
            ['country_code' => 'IN', 'code' => 'TG', 'name' => 'Telangana'],
            ['country_code' => 'IN', 'code' => 'TR', 'name' => 'Tripura'],
            ['country_code' => 'IN', 'code' => 'UP', 'name' => 'Uttar Pradesh'],
            ['country_code' => 'IN', 'code' => 'UT', 'name' => 'Uttarakhand'],
            ['country_code' => 'IN', 'code' => 'WB', 'name' => 'West Bengal']
        ];

        $brazilianStates = [
            ['country_code' => 'BR', 'code' => 'AC', 'name' => 'Acre'],
            ['country_code' => 'BR', 'code' => 'AL', 'name' => 'Alagoas'],
            ['country_code' => 'BR', 'code' => 'AP', 'name' => 'Amapá'],
            ['country_code' => 'BR', 'code' => 'AM', 'name' => 'Amazonas'],
            ['country_code' => 'BR', 'code' => 'BA', 'name' => 'Bahia'],
            ['country_code' => 'BR', 'code' => 'CE', 'name' => 'Ceará'],
            ['country_code' => 'BR', 'code' => 'DF', 'name' => 'Distrito Federal'],
            ['country_code' => 'BR', 'code' => 'ES', 'name' => 'Espírito Santo'],
            ['country_code' => 'BR', 'code' => 'GO', 'name' => 'Goiás'],
            ['country_code' => 'BR', 'code' => 'MA', 'name' => 'Maranhão'],
            ['country_code' => 'BR', 'code' => 'MT', 'name' => 'Mato Grosso'],
            ['country_code' => 'BR', 'code' => 'MS', 'name' => 'Mato Grosso do Sul'],
            ['country_code' => 'BR', 'code' => 'MG', 'name' => 'Minas Gerais'],
            ['country_code' => 'BR', 'code' => 'PA', 'name' => 'Pará'],
            ['country_code' => 'BR', 'code' => 'PB', 'name' => 'Paraíba'],
            ['country_code' => 'BR', 'code' => 'PR', 'name' => 'Paraná'],
            ['country_code' => 'BR', 'code' => 'PE', 'name' => 'Pernambuco'],
            ['country_code' => 'BR', 'code' => 'PI', 'name' => 'Piauí'],
            ['country_code' => 'BR', 'code' => 'RJ', 'name' => 'Rio de Janeiro'],
            ['country_code' => 'BR', 'code' => 'RN', 'name' => 'Rio Grande do Norte'],
            ['country_code' => 'BR', 'code' => 'RS', 'name' => 'Rio Grande do Sul'],
            ['country_code' => 'BR', 'code' => 'RO', 'name' => 'Rondônia'],
            ['country_code' => 'BR', 'code' => 'RR', 'name' => 'Roraima'],
            ['country_code' => 'BR', 'code' => 'SC', 'name' => 'Santa Catarina'],
            ['country_code' => 'BR', 'code' => 'SP', 'name' => 'São Paulo'],
            ['country_code' => 'BR', 'code' => 'SE', 'name' => 'Sergipe'],
            ['country_code' => 'BR', 'code' => 'TO', 'name' => 'Tocantins']
        ];

        $mexicanStates = [
            ['country_code' => 'MX', 'code' => 'AGU', 'name' => 'Aguascalientes'],
            ['country_code' => 'MX', 'code' => 'BCN', 'name' => 'Baja California'],
            ['country_code' => 'MX', 'code' => 'BCS', 'name' => 'Baja California Sur'],
            ['country_code' => 'MX', 'code' => 'CAM', 'name' => 'Campeche'],
            ['country_code' => 'MX', 'code' => 'CHP', 'name' => 'Chiapas'],
            ['country_code' => 'MX', 'code' => 'CHH', 'name' => 'Chihuahua'],
            ['country_code' => 'MX', 'code' => 'CMX', 'name' => 'Ciudad de México'],
            ['country_code' => 'MX', 'code' => 'COA', 'name' => 'Coahuila'],
            ['country_code' => 'MX', 'code' => 'COL', 'name' => 'Colima'],
            ['country_code' => 'MX', 'code' => 'DUR', 'name' => 'Durango'],
            ['country_code' => 'MX', 'code' => 'GUA', 'name' => 'Guanajuato'],
            ['country_code' => 'MX', 'code' => 'GRO', 'name' => 'Guerrero'],
            ['country_code' => 'MX', 'code' => 'HID', 'name' => 'Hidalgo'],
            ['country_code' => 'MX', 'code' => 'JAL', 'name' => 'Jalisco'],
            ['country_code' => 'MX', 'code' => 'MEX', 'name' => 'Estado de México'],
            ['country_code' => 'MX', 'code' => 'MIC', 'name' => 'Michoacán'],
            ['country_code' => 'MX', 'code' => 'MOR', 'name' => 'Morelos'],
            ['country_code' => 'MX', 'code' => 'NAY', 'name' => 'Nayarit'],
            ['country_code' => 'MX', 'code' => 'NLE', 'name' => 'Nuevo León'],
            ['country_code' => 'MX', 'code' => 'OAX', 'name' => 'Oaxaca'],
            ['country_code' => 'MX', 'code' => 'PUE', 'name' => 'Puebla'],
            ['country_code' => 'MX', 'code' => 'QUE', 'name' => 'Querétaro'],
            ['country_code' => 'MX', 'code' => 'ROO', 'name' => 'Quintana Roo'],
            ['country_code' => 'MX', 'code' => 'SLP', 'name' => 'San Luis Potosí'],
            ['country_code' => 'MX', 'code' => 'SIN', 'name' => 'Sinaloa'],
            ['country_code' => 'MX', 'code' => 'SON', 'name' => 'Sonora'],
            ['country_code' => 'MX', 'code' => 'TAB', 'name' => 'Tabasco'],
            ['country_code' => 'MX', 'code' => 'TAM', 'name' => 'Tamaulipas'],
            ['country_code' => 'MX', 'code' => 'TLA', 'name' => 'Tlaxcala'],
            ['country_code' => 'MX', 'code' => 'VER', 'name' => 'Veracruz'],
            ['country_code' => 'MX', 'code' => 'YUC', 'name' => 'Yucatán'],
            ['country_code' => 'MX', 'code' => 'ZAC', 'name' => 'Zacatecas']
        ];

        $germanStates = [
            ['country_code' => 'DE', 'code' => 'BW', 'name' => 'Baden-Württemberg'],
            ['country_code' => 'DE', 'code' => 'BY', 'name' => 'Bavaria'],
            ['country_code' => 'DE', 'code' => 'BE', 'name' => 'Berlin'],
            ['country_code' => 'DE', 'code' => 'BB', 'name' => 'Brandenburg'],
            ['country_code' => 'DE', 'code' => 'HB', 'name' => 'Bremen'],
            ['country_code' => 'DE', 'code' => 'HH', 'name' => 'Hamburg'],
            ['country_code' => 'DE', 'code' => 'HE', 'name' => 'Hesse'],
            ['country_code' => 'DE', 'code' => 'MV', 'name' => 'Mecklenburg-Vorpommern'],
            ['country_code' => 'DE', 'code' => 'NI', 'name' => 'Lower Saxony'],
            ['country_code' => 'DE', 'code' => 'NW', 'name' => 'North Rhine-Westphalia'],
            ['country_code' => 'DE', 'code' => 'RP', 'name' => 'Rhineland-Palatinate'],
            ['country_code' => 'DE', 'code' => 'SL', 'name' => 'Saarland'],
            ['country_code' => 'DE', 'code' => 'SN', 'name' => 'Saxony'],
            ['country_code' => 'DE', 'code' => 'ST', 'name' => 'Saxony-Anhalt'],
            ['country_code' => 'DE', 'code' => 'SH', 'name' => 'Schleswig-Holstein'],
            ['country_code' => 'DE', 'code' => 'TH', 'name' => 'Thuringia']
        ];

        $frenchRegions = [
            ['country_code' => 'FR', 'code' => 'ARA', 'name' => 'Auvergne-Rhône-Alpes'],
            ['country_code' => 'FR', 'code' => 'BFC', 'name' => 'Bourgogne-Franche-Comté'],
            ['country_code' => 'FR', 'code' => 'BRE', 'name' => 'Brittany'],
            ['country_code' => 'FR', 'code' => 'CVL', 'name' => 'Centre-Val de Loire'],
            ['country_code' => 'FR', 'code' => 'COR', 'name' => 'Corsica'],
            ['country_code' => 'FR', 'code' => 'GES', 'name' => 'Grand Est'],
            ['country_code' => 'FR', 'code' => 'HDF', 'name' => 'Hauts-de-France'],
            ['country_code' => 'FR', 'code' => 'IDF', 'name' => 'Île-de-France'],
            ['country_code' => 'FR', 'code' => 'NOR', 'name' => 'Normandy'],
            ['country_code' => 'FR', 'code' => 'NAQ', 'name' => 'Nouvelle-Aquitaine'],
            ['country_code' => 'FR', 'code' => 'OCC', 'name' => 'Occitanie'],
            ['country_code' => 'FR', 'code' => 'PDL', 'name' => 'Pays de la Loire'],
            ['country_code' => 'FR', 'code' => 'PAC', 'name' => 'Provence-Alpes-Côte d\'Azur']
        ];

        $japanesePrefectures = [
            ['country_code' => 'JP', 'code' => 'HOK', 'name' => 'Hokkaido'],
            ['country_code' => 'JP', 'code' => 'AOM', 'name' => 'Aomori'],
            ['country_code' => 'JP', 'code' => 'IWA', 'name' => 'Iwate'],
            ['country_code' => 'JP', 'code' => 'MIY', 'name' => 'Miyagi'],
            ['country_code' => 'JP', 'code' => 'AKI', 'name' => 'Akita'],
            ['country_code' => 'JP', 'code' => 'YAM', 'name' => 'Yamagata'],
            ['country_code' => 'JP', 'code' => 'FUK', 'name' => 'Fukushima'],
            ['country_code' => 'JP', 'code' => 'IBR', 'name' => 'Ibaraki'],
            ['country_code' => 'JP', 'code' => 'TOCH', 'name' => 'Tochigi'],
            ['country_code' => 'JP', 'code' => 'GUN', 'name' => 'Gunma'],
            ['country_code' => 'JP', 'code' => 'SAI', 'name' => 'Saitama'],
            ['country_code' => 'JP', 'code' => 'CHI', 'name' => 'Chiba'],
            ['country_code' => 'JP', 'code' => 'TOK', 'name' => 'Tokyo'],
            ['country_code' => 'JP', 'code' => 'KAN', 'name' => 'Kanagawa'],
            ['country_code' => 'JP', 'code' => 'NII', 'name' => 'Niigata'],
            ['country_code' => 'JP', 'code' => 'TOY', 'name' => 'Toyama'],
            ['country_code' => 'JP', 'code' => 'ISH', 'name' => 'Ishikawa'],
            ['country_code' => 'JP', 'code' => 'FUKI', 'name' => 'Fukui'],
            ['country_code' => 'JP', 'code' => 'YAMN', 'name' => 'Yamanashi'],
            ['country_code' => 'JP', 'code' => 'NAG', 'name' => 'Nagano'],
            ['country_code' => 'JP', 'code' => 'GIF', 'name' => 'Gifu'],
            ['country_code' => 'JP', 'code' => 'SHI', 'name' => 'Shizuoka'],
            ['country_code' => 'JP', 'code' => 'AIC', 'name' => 'Aichi'],
            ['country_code' => 'JP', 'code' => 'MIE', 'name' => 'Mie'],
            ['country_code' => 'JP', 'code' => 'SHI', 'name' => 'Shiga'],
            ['country_code' => 'JP', 'code' => 'KYO', 'name' => 'Kyoto'],
            ['country_code' => 'JP', 'code' => 'OSA', 'name' => 'Osaka'],
            ['country_code' => 'JP', 'code' => 'HYO', 'name' => 'Hyogo'],
            ['country_code' => 'JP', 'code' => 'NAR', 'name' => 'Nara'],
            ['country_code' => 'JP', 'code' => 'WAK', 'name' => 'Wakayama'],
            ['country_code' => 'JP', 'code' => 'TOT', 'name' => 'Tottori'],
            ['country_code' => 'JP', 'code' => 'SHI', 'name' => 'Shimane'],
            ['country_code' => 'JP', 'code' => 'OKA', 'name' => 'Okayama'],
            ['country_code' => 'JP', 'code' => 'HIR', 'name' => 'Hiroshima'],
            ['country_code' => 'JP', 'code' => 'YAM', 'name' => 'Yamaguchi'],
            ['country_code' => 'JP', 'code' => 'TOK', 'name' => 'Tokushima'],
            ['country_code' => 'JP', 'code' => 'KAG', 'name' => 'Kagawa'],
            ['country_code' => 'JP', 'code' => 'EHI', 'name' => 'Ehime'],
            ['country_code' => 'JP', 'code' => 'KOC', 'name' => 'Kochi'],
            ['country_code' => 'JP', 'code' => 'FUK', 'name' => 'Fukuoka'],
            ['country_code' => 'JP', 'code' => 'SAG', 'name' => 'Saga'],
            ['country_code' => 'JP', 'code' => 'NAG', 'name' => 'Nagasaki'],
            ['country_code' => 'JP', 'code' => 'KUM', 'name' => 'Kumamoto'],
            ['country_code' => 'JP', 'code' => 'OIT', 'name' => 'Oita'],
            ['country_code' => 'JP', 'code' => 'MIY', 'name' => 'Miyazaki'],
            ['country_code' => 'JP', 'code' => 'KAG', 'name' => 'Kagoshima'],
            ['country_code' => 'JP', 'code' => 'OKI', 'name' => 'Okinawa']
        ];

        $states = array_merge(
            $canadianProvinces,
            $usStates,
            $ukRegions,
            $australianStates,
            $indianStates,
            $brazilianStates,
            $mexicanStates,
            $germanStates,
            $frenchRegions,
            $japanesePrefectures
        );

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
