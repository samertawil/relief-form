<?php



use App\Modules\Status\Models\status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('citizen_profiles');  // create profile_id to be as "owner for damage file"  صاحب ملف الاضرار - الذي وقع عليه الضرر  بحال الاضرار الاقتصادية او جزء من الاضرار البشرية
          
            $table->foreignId('damage_type')->constrained('statuses'); // ضرر بشري ام ضرر اقتصادي
            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->unique(['profile_id','damage_type']);
            $table->enum('active',[0,1])->default(1);
            $table->foreignId('created_by')->nullable()->constrained('citizen_profiles'); 
            $table->json('attachments')->nullable();
            $table->timestamp('last_active_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('damage_masters');
    }
};
