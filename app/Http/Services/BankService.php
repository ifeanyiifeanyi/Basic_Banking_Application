<?php
// BankService.php
namespace App\Services;

use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class BankService
{
    public function createBank(array $data)
    {
        return DB::transaction(function () use ($data) {
            $bank = Bank::create($data);

            if (isset($data['requirements'])) {
                $this->updateRequirements($bank, $data['requirements']);
            }

            return $bank;
        });
    }

    public function updateBank(Bank $bank, array $data)
    {
        return DB::transaction(function () use ($bank, $data) {
            $bank->update($data);

            if (isset($data['requirements'])) {
                $this->updateRequirements($bank, $data['requirements']);
            }

            return $bank;
        });
    }

    public function deleteBank(Bank $bank)
    {
        return DB::transaction(function () use ($bank) {
            $bank->requirements()->delete();
            $bank->delete();
        });
    }

    protected function updateRequirements(Bank $bank, array $requirements)
    {
        $bank->requirements()->delete();

        $requirementsData = collect($requirements)->map(function ($requirement, $index) {
            return $requirement + ['order' => $index];
        })->all();

        $bank->requirements()->createMany($requirementsData);
    }
}
