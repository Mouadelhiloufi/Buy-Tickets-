<?php
    require_once __DIR__."../../../classes/Admin.php";
    $users=Admin::show_users();


    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['desactive'])){
           $user_id=$_POST['user_id'];
           Admin::desactive($user_id);
           header("location: ".$_SERVER['PHP_SELF']);
            exit();
        }else if(isset($_POST['active'])){
            $user_id=$_POST['user_id'];
            Admin::active($user_id);
            header("location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tighter italic">Utilisateurs</h1>
                <p class="text-gray-500 font-medium">Gérez les accès et les comptes de la plateforme.</p>
            </div>
            
            <a href="dashboard.php" 
       class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-200 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-green-700 hover:border-green-500 transition-all flex items-center gap-2">
        <i class="fas fa-arrow-left"></i> Dashboard
    </a>
        </div>

        <div class="mb-6 relative">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Rechercher un nom ou un email..." 
                   class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 focus:border-green-500 outline-none shadow-sm transition-all">
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Utilisateur</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Rôle</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Statut</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <?php foreach($users as $user):?>
                    <tbody class="divide-y divide-gray-50">
                        
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-6 flex items-center gap-4">
                                <div class="w-10 h-10 bg-green-100 text-green-700 rounded-full flex items-center justify-center font-bold">
                                    JD
                                </div>
                                <div>
                                    <div class="font-bold text-gray-800"><?= $user['nom']." ".$user['prenom'] ?></div>
                                    <div class="text-xs text-gray-400"><?= $user['prenom'] ?></div>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="text-xs font-bold text-gray-600 bg-gray-100 px-3 py-1 rounded-lg"><?= $user['role'] ?></span>
                            </td>
                            <td class="p-6">
                                <?php if($user['actif']===1):?>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    <span class="text-xs font-bold text-gray-700">Actif</span>
                                </div>
                                
                                <?php elseif($user['actif']===0):?>
                                    <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                                    <span class="text-xs font-bold text-gray-400">Désactivé</span>
                                </div>
                                <?php endif;?>
                                
                            </td>
                            <td class="p-6 text-right">
                                <?php if($user['actif']===1): ?>
                                <form action="#" method="POST">
                                    <input type="hidden" name="desactive">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit"
                                            class="bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase transition-all flex items-center gap-2 ml-auto">
                                        <i class="fas fa-user-slash"></i> Désactiver
                                    </button>
                                </form>
                                <?php endif;?>

                                <?php if($user['actif']===0): ?>
                                <form action="#" method="POST">
                                    <input type="hidden" name="active">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" 
                                            class="bg-green-50 text-green-600 hover:bg-green-600 hover:text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase transition-all flex items-center gap-2 ml-auto">
                                        <i class="fas fa-user-check"></i> Activer
                                    </button>
                                </form>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach;?>

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>